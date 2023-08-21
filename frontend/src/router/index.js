import { createRouter, createWebHistory } from 'vue-router'

//import ArtikelList, ArtikelEdit, ArtikelAdd, ArtikelDetail dari folder view
import ArtikelList from '../views/ArtikelList.vue'
import ArtikelEdit from '../views/ArtikelEdit.vue'
import ArtikelAdd from '../views/ArtikelAdd.vue'
import ArtikelDetail from '../views/ArtikelDetail.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),

  //buat route bagian frontend
  routes: [
    {
      path: '/',
      name: 'ArtikelList',
      component: ArtikelList
    },
    {
      path: '/edit/:id',
      name: 'ArtikelEdit',
      component: ArtikelEdit
    },
    {
      path: '/add',
      name: 'ArtikelAdd',
      component: ArtikelAdd
    },
    {
      path: '/:id',
      name: 'ArtikelDetail',
      component: ArtikelDetail
    },
  ]
})

export default router
