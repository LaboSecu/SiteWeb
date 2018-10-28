<template>
  <div id="app">
    <Header />
    <router-view/>
    <Footer />
    <PageTransitions name="fade" :options="{ color: '#242424', number: 3 }"/>
  </div>
</template>

<script>
import Header from '@/components/layout/Header.vue'
import Footer from '@/components/layout/Footer.vue'
import PageTransitions from '@/components/layout/PageTransitions.vue'
require('uikit')
export default {
  name: 'App',
  components: {
    Header,
    Footer,
    PageTransitions
  }
}
</script>

<style lang="less">
@import "../node_modules/uikit/dist/css/uikit.min.css";

body {
  padding-top: 70px;
  font-family: 'Roboto', sans-serif;
}

a {
  color: inherit;

  &:hover {
    text-decoration: none;
  }
}
a:not(.btn) {
  text-decoration: underline;
}

.btn {
  z-index: 1;
  position: relative;
  display: inline-block;
  height: 40px;
  line-height: 40px;
  padding: 0 15px;
  font-family: 'Roboto Condensed', sans-serif;
  font-size: 18px;
  color: #2b2b2b;
  border: 1px solid #2b2b2b;
  transition: color 0.3s ease-in-out;

  &::before {
    z-index: -1;
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    width: 0;
    background: #2b2b2b;
    transition: width 0.3s ease-in-out;
  }

  &:hover, &.active {
    color: #fff;

    &::before {
      width: 100%;
    }
  }
}

.link {
  position: relative;

  &::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    height: 1px;
    width: 0;
    background-color: #fff;
    transition: width 0.3s ease-in-out;
  }

  &:hover, &.active {

    &::after {
      width: 100%;
    }
  }
}
</style>
