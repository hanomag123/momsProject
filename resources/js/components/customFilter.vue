<template>
  <form action="#" class="articles-form --events">
    <div class="input-wrapper">
      <input type="text" @input="callDebounce" v-model="year" class="input form-container__input">
      <div class="input-placeholder">Год статьи</div>
    </div>

    <div class="input-wrapper">
      <input type="text" @input="callDebounce" v-model="title" class="input form-container__input">
      <div class="input-placeholder">Название статьи</div>
    </div>

    <v-select 
    :options="options"
    @select="optionSelect"
    :selected="selected"
    />
  </form>

  <div v-if="this.events.length > 0">
    <transition-group tag="ul" name="list" class="news-list page-margin-container" appear>

      <li v-for="article of events" :key="article.id" class="news-item">
        <a :href="article.slug">
          <div class="h5">{{ article.date }}</div>
          <div class="img-cover rounded news-img"><img :src="article.image" alt="news"></div>
          <div class="news-title h4">{{ article.title }}</div>
          <div class="news-desc text-2">{{ article.content }}</div>
        </a>
      </li>

    </transition-group>
  </div>
  <Transition name="fade">
    <div v-if="this.events.length === 0">
      Ничего не найдено
    </div>
  </Transition>
  <Pagination :data="pagination" :limit="2" @pagination-change-page="filter" />
</template>

<script>
import axios from 'axios';
import debounce from 'lodash.debounce';
import vSelect from './v-select.vue';

export default {
  name: "customFilter",
  components: {
    vSelect,
  },
  data: function () {
    return {
      events: [],
      year: '',
      page: '',
      title: '',
      month: '',
      pagination: [],
      options: [
      {name: 'Январь', value: 1},
      {name: 'Февраль', value: 2},
      {name: 'Март', value: 3},
      {name: 'Апрель', value: 4},
      {name: 'Май', value: 5},
      {name: 'Июнь', value: 6},
      {name: 'Июль', value: 7},
      {name: 'Август', value: 8},
      {name: 'Сентябрь', value: 9},
      {name: 'Октябрь', value: 10},
      {name: 'Ноябрь', value: 11},
      {name: 'Декабрь', value: 12},
      ],

      selected: 'Выберите месяц',
    }
  },
  mounted() {
    this.getArticles();
  },
  methods: {
    callDebounce: debounce(function () {
      this.deb();
    }, 500),
    deb() {
      this.filter();
    },
    optionSelect(option) {
      this.selected = option.name;
      this.month = option.value;
      
      this.callDebounce();
    },
    async getArticles() {
      try {
        const events = await axios({
          method: 'get',
          url: '/api/events',
          params: {
            locale: document.getElementById('PageLocale').value,
          }
        })
        this.events = events.data.items;
        this.pagination = events.data.paginate;
      } catch (error) {
        console.log(error)
      }
    },
    async filter(page = 1) {
      try {
        const events = await axios({
          method: 'get',
          url: '/api/events',
          params: {
            year: this.year,
            page: page,
            title: encodeURIComponent(this.title),
            locale: document.getElementById('PageLocale').value,
            month: this.month,
          }
        })
        this.events = events.data.items;
        this.pagination = events.data.paginate;
        console.log(events.data)
      } catch (error) {
        console.log(error)
      }
    },
    
  },

}
</script>

<style scoped>
.news-list {
  position: relative;
}

.list-leave-to,
.list-enter-from {
  opacity: 0;
  transform: scale(0.6);
}

.list-leave-from,
.list-enter-to {
  opacity: 1;
  transform: scale(1);
}

.list-enter-active,
.list-leave-active {
  transition: all .3s;
}

.list-leave-active {
  position: absolute;
}

.list-move {
  transition: all .3s;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}</style>
