<template>
    <div class="color">
        <div class="content">
            <div class="sidebar shadow p-3 mb-5" id="sidebar">
               
                <ul>
                    <li>
                        <a href="http://localhost:8000">Catálogo</a>
                    </li>
                    <li>
                        <a href="http://localhost:8000/admin">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
// const btnToggle = document.querySelector(".btn");
// btnToggle.addEventListener("click", function () {

export default {
    methods: {
        toggleSideBar: () => {
            // this.state = !this.state;
            // console.log(this.state, "test information");
            var t = document
                .getElementById("sidebar")
                .classList.toggle("active");
            console.log(t, "encontre un id asi");
        },
    },
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css?family=Karla|Oswald&display=swap");

* {
    margin: 0;
    padding: 0;
}

.logo {
    margin-left: 5px;
    height: 64px;
    width: 64px;
    vertical-align: top;
}

.sidebar {
    position: fixed;
    left: 0px;
    width: 255px;
    height: 100%;
    background-color: #222425;
    transition: all 0.5s ease;
}

.sidebar header {
    font-size: 22px;
    color: white;
    text-align: center;
    line-height: 70px;
    margin-bottom: 40px;
    user-select: none;
}

.sidebar ul a {
    list-style: none;
    text-decoration: none;
    display: block;
    height: 100%;
    width: 100%;
    line-height: 65px;
    font-size: 20px;
    padding-left: 40px;
    font-weight: 200;
    font-family: "Karla", sans-serif;
    color: white;
    box-sizing: border-box;
    border-bottom: 1px solid rgba(51, 43, 43, 0.432);
    transition: 0.4s;
}

#sidebar.active {
    left: 0;
}

ul li:hover a {
    padding-left: 40px;
    border-left: 5px solid #4aa0e6;
    background-color: #283944;
}

#check,
#open {
    display: none;
}

label #btn,
label #close {
    position: absolute;
    cursor: pointer;
    background-color: white;
    border-radius: 3px;
}

label #btn {
    left: 150px;
    font-size: 35px;
    padding: 6px 12px;
    transition: all 0.5s;
}

/* label #close {
    z-index: 1111;
    left: 215px;
    font-size: 30px;
    color: white;
    padding: 4px 9px;
} */

/* #open:checked ~ .sidebar {
    left: 0;
    left: 250px;
    opacity: 0;
    pointer-events: none;
}} */

#open:checked ~ #btn {
    left: 250px;
    opacity: 0;
    pointer-events: none;
}

#check:checked ~ .sidebar {
    left: 0;
}

.m-b-md {
    margin-bottom: 30px;
}

* {
    margin: 0px;
    padding: 0px;
}
</style>
