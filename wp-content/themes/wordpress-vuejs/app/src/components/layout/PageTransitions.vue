<template>
  <div id="page-transitions-container" v-if="config">
    <!-- Fade transition -->
    <div v-if="name === 'fade'" :class="{ fade: true }" id="page-transitions" :style="{ backgroundColor: config.color }"></div>
    <!-- Columns transition -->
    <div v-if="name === 'columns'" :class="{ columns: true, top: config.from === 'top', bottom: config.from === 'bottom' }" id="page-transitions">
      <div :style="{ width: `calc(100% / ${config.number})`, backgroundColor: config.color }" v-for="(div, i) in config.divs" :key="i">{{ div }}</div>
    </div>
    <!-- Rows transition -->
    <div v-if="name === 'rows'" :class="{ rows: true, left: config.from === 'left', right: config.from === 'right' }" id="page-transitions">
      <div :style="{ height: `calc(100% / ${config.number})`, backgroundColor: config.color }" v-for="(div, i) in config.divs" :key="i">{{ div }}</div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'PageTransitions',
  props: {
    name: {
      type: String,
      default: 'fade'
    },
    options: {
      type: Object,
      default: function () {
        return {}
      }
    }
  },
  data () {
    return {
      config: undefined
    }
  },
  created () {
    switch (this.name) {
      case 'fade':
        this.config = Object.assign({}, { color: '#fff' }, this.options)
        break
      case 'columns':
        this.config = Object.assign({}, { color: '#fff', number: 5, from: 'top' }, this.options)
        this.config.divs = new Array(this.config.number)
        break
      case 'rows':
        this.config = Object.assign({}, { color: '#fff', number: 5, from: 'left' }, this.options)
        this.config.divs = new Array(this.config.number)
        break
    }
  }
}
</script>

<style scoped lang="less">
#page-transitions {
  position: absolute;
  top: 0;
  left: 0;
  height: 100vh;
  width: 100%;
  pointer-events: none;

  &.fade {
    opacity: 1;
    pointer-events: all;
  }

  &.columns {
    display: flex;
    flex-direction: row;

    div {
      height: 100%;
      pointer-events: all;
    }
  }

  &.rows {
    display: flex;
    flex-direction: column;

    div {
      width: 100%;
      pointer-events: all;
    }
  }
}
</style>
