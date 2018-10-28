<template>
  <header>
    <div class="uk-container">
      <div class="header-container">
        <div class="logo">
          <router-link :to="{ name: 'Home' }">Logo</router-link>
        </div>
        <ul>
          <li v-for="item in header" :key="item.id">
            <router-link :to="{ path: item.url }">{{ item.title }}</router-link>
          </li>
        </ul>
      </div>
    </div>
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
  z-index: 10;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  background-color: #2b2b2b;

  .header-container {
    height: 70px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;

    .logo {

      a {
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: 700;
        color: #fff;
        letter-spacing: 0.02em;

        &:hover, &.router-link-active {
          color: #fff;
          text-decoration: none;
        }
      }
    }

    ul {
      margin: 0;

      li {
        display: inline-block;
        list-style: none;
        margin-left: 20px;

        a {
          font-family: 'Roboto Condensed', sans-serif;
          color: #ccc;
          text-decoration: none;
          transition: color 0.3s ease-in-out;

          &:hover, &.router-link-active {
            color: #fff;
            text-decoration: none;
          }
        }
      }
    }
  }
}
</style>
