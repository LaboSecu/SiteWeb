<template>
  <header>
    <ul>
      <li><router-link :to="{ name: 'Home' }">Home</router-link></li>
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
</style>
