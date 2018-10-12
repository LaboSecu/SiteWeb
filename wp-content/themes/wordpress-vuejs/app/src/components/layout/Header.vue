<template>
  <header>
    <div class="logo">
      <router-link :to="{ name: 'Home' }">Laboratoire sécurité</router-link>
    </div>
    <ul>
      <li v-for="item in header" :key="item.id">
        <router-link :to="{ path: item.url }">{{ item.title }}</router-link>
      </li>
    </ul>
  </header>
</template>

<script>
import { menus } from '@/services'
export default {
  name: 'Header',
  data () {
    return {
      header: []
    }
  },
  mounted () {
    this.getHeader()
  },
  methods: {
    getHeader: async function () {
      this.header = await menus.get('header')
    }
  }
}
</script>

<style scoped lang="less">
header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: 70px;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  padding: 0 15px;
  background-color: #424242;

  .logo {

  }

  ul {

    li {
      display: inline-block;
      list-style: none;
    }
  }
}
</style>
