<template>
  <div id="app" class="container">
    <nav class="navbar navbar-expand-sm bg-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link :to="{ name: 'Home' }" class="nav-link"> Principal</router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{ name: 'Add' }" class="nav-link">Añadir Peliculas</router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{ name: 'List' }" class="nav-link">Lista de Peliculas</router-link>
        </li>
      </ul>
    </nav>
    <div class="gap">
      <router-view></router-view>
    </div>
  </div>
</template>


<style>
  .gap {
    margin-top: 50px;
  }
</style>

<script>

export default {
  name: 'app'
}
</script>