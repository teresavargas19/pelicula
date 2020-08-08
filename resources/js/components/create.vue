<template>
    <div class="color album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="all col-md-8 offset-md-2">
                    <h3 class="badge badge-info">Creacion de Pelicula</h3>

                    <form
                        class="shadow p-3 mb-5 bg-white rounded"
                        @submit.prevent="saveMovie"
                    >
                        <div class="form-group">
                            <label for="Movie Title">Titulo de Pelicula</label>
                            <input
                                type="text"
                                class="form-control"
                                :class="errors.title ? 'is-invalid' : ''"
                                placeholder="Titulo de Pelicula"
                                v-model="movie.title"
                                required
                            />
                        </div>
                        <div class="form-group">
                            <label for="Movie Launcher">Director de Pelicula</label>
                            <input
                                type="text"
                                class="form-control"
                                :class="errors.cast ? 'is-invalid' : ''"
                                placeholder="Director de Pelicula"
                                v-model="movie.cast"
                                required
                            />
                            <div class="invalid-feedback" v-if="errors.cast">
                                {{ errors.cast[0] }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Movie Category">Categoria de Pelicula</label>
                            <input
                                type="text"
                                class="form-control"
                                :class="errors.category ? 'is-invalid' : ''"
                                placeholder="Categoria de Pelicula"
                                v-model="movie.category"
                                required
                            />
                            <div class="invalid-feedback" v-if="errors.name">
                                {{ errors.name[0] }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Movie Launcher">Fecha de Extreno</label>
                            <input
                                type="date"
                                class="form-control"
                                :class="errors.launcher ? 'is-invalid' : ''"
                                placeholder="Fecha de Extreno"
                                v-model="movie.launcher"
                                required
                            />
                            <div class="invalid-feedback" v-if="errors.name">
                                {{ errors.name[0] }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Movie Description"
                                >Descripcion</label
                            >
                            <textarea
                                type="text"
                                class="form-control"
                                :class="errors.description ? 'is-invalid' : ''"
                                placeholder="Descripcion"
                                v-model="movie.description"
                                @keydown="errors.description = ''"
                                rows="6"
                                required
                            ></textarea>
                            <div
                                class="invalid-feedback"
                                v-if="errors.description"
                            >
                                {{ errors.description[0] }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Movie Youtube Link">
                                Url de la Pelicula Youtube
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                :class="errors.link_trailer ? 'is-invalid' : ''"
                                placeholder="Url de la Pelicula Youtube"
                                v-model="movie.link_trailer"
                                required
                            />
                            <div
                                class="invalid-feedback"
                                v-if="errors.link_trailer"
                            >
                                {{ errors.link_trailer[0] }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Movie Rating">Puntuacion de Pelicula</label>
                            <select
                                class="form-control"
                                :class="errors.rating ? 'is-invalid' : ''"
                                v-model="movie.rating"
                                @keydown="errors.rating = ''"
                                required
                            >
                                <option
                                    value="movie.rating"
                                    selected
                                    v-if="movie.rating"
                                    >{{ movie.rating }}</option
                                >
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <div class="invalid-feedback" v-if="errors.rating">
                                {{ errors.rating[0] }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Foto de Portada</label>
                            <br />
                            <input
                                type="file"
                                v-on:change="onImageChange"
                                class=""
                                required
                            />
                            <div
                                :class="errors.country ? 'is-invalid' : ''"
                                v-if="errors.image"
                            >
                                {{ errors.image[0] }}
                            </div>
                        </div>
                        <div>
                            <img
                                :src="movie.image"
                                v-if="movie.image"
                                class="img-responsive film-image"
                            />
                        </div>
                        <hr />
                        <div class="alert alert-success" v-if="status === 200">
                            Movie updated successfully
                        </div>
                        <div class="alert alert-danger" v-if="status === 409">
                            {{ errors }}
                        </div>
                        <button class="enviar btn btn-lg btn-primary btn-block">
                            <a> Guardar Pelicula </a>
                        </button>
                    </form>
                    <div class="alert alert-success" v-if="status === 201">
                        Movie create successfully
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            movie: {
                title: "",
                description: "",
                category: "",
                image: "",
                link_trailer: "",
                launcher: "",
                cast: "",
                rating: "",
            },
            errors: [],
            status: "",
        };
    },
    methods: {
        onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length) {
                return;
            }
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            reader.onload = (e) => {
                this.movie.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        saveMovie() {
            axios
                .post("http://localhost:8000/api/movie", this.movie)
                .then((res) => {
                    this.status = res.status;
                    console.log(res);
                    this.movie.title = "";
                    this.movie.description = "";
                    this.movie.category = "";
                    this.movie.image = "";
                    this.movie.link_trailer = "";
                    this.movie.launcher = "";
                    this.movie.rating = 0;
                    this.movie.cast = "";
                })
                .catch((err) => {
                    this.errors = err.data.errors;
                    this.status = err.status;
                });
        },
    },
};
</script>

<style>
.film-image {
    width: 40%;
}

.all {
    margin-left: 200px;
    background-color: #f8f9fa;
}

.all input {
    background-color: #f8f8f8;
}

.all h3 {
    font-size: 25px;
}

.enviar a {
    text-decoration: none;
    color: black;
    font-weight: bold;
}

label {
    font-weight: bolder;
}
</style>
