<template>
  <footer>
    <div class="uk-container">
      <div class="footer-container">
        <p>Laboratoire sécurité Ynov Paris, réservé aux étudiants Ynov</p>
        <span v-for="(item, i) in footer" :key="item.id">
          {{ i !== 0 ? '&nbsp;—&nbsp;' : '' }}
          <a :href="item.url" class="link" target="_blank">{{ item.title }}</a>
        </span>
      </div>
    </div>
  </footer>
</template>

<script>
import { menus } from '@/services'
export default {
  name: 'Footer',
  data () {
    return {
      footer: []
    }
  },
  mounted () {
    this.getFooter()
  },
  methods: {
    getFooter: async function () {
      this.footer = await menus.get('footer')
    }
  }
}
</script>

<style scoped lang="less">
footer {
  padding: 40px 0;
  background-color: #2b2b2b;

  .footer-container {
    font-weight: 300;
    font-size: 15px;
    color: #ddd;

    p {
      margin-bottom: 10px;
    }

    .link:hover {
      color: #ddd;
    }
  }
}
</style>
