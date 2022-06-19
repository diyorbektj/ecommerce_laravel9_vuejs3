import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import Product from '../pages/Product';
import Rating from '../components/Rating'
import Admin from '../admin/Dashboard'
import AdddProduct from '../admin/AddProduct'
import Category from '../admin/pages/Category'
import Products from '../admin/pages/Products'
import Profile from '../users/Profile'
import Filter from '../pages/Filter'
import BuyProduct from "../pages/BuyProduct";

function loggedIn(to, from, next){
    if(localStorage.getItem('token')){
        return next()
    }else{
        router.push('/')
    }
}

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home,
        meta: { title: 'Welcome' }
    },
    {
        name: 'rating',
        path: '/rating',
        component: Rating
    },
    {
        name: 'admin',
        path: '/admin',
        component: Admin
    },
    {
        name: 'addproduct',
        path: '/admin/addproduct',
        component: AdddProduct
    },
    {
        name: 'admin.category',
        path: '/admin/category',
        component: Category
    },
    {
        name: 'admin.products',
        path: '/admin/products',
        component: Products
    },
    {
        name: 'product.id',
        path: '/product/:id',
        component: Product,
        props: true
    },
    {
        name: 'user.profile',
        path: '/users/profile',
        component: Profile,
        beforeEnter: [loggedIn]
    },
    {
        name: 'filter.products',
        path: '/products/filter',
        component: Filter
    },
    {
        name: 'buy.product',
        path: '/buyproduct',
        component: BuyProduct,
        beforeEnter: [loggedIn]
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
