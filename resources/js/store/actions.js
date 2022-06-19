import axios from "axios";

const actions = {
    GET_PRODUCTS: function ( {commit} ) {
        window.axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        axios.get('/api/shopingcart/').then(response => {
            commit('SET_PRODUCTS', response.data.data);
        })
    },
    addUser({ commit }, product) {
        let data = new FormData();
        data.append('product_id', product.id);
        window.axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        axios.post('/api/shopingcart/add', data)
            .then(response => {
                commit('UPDATE_CART_ITEM', response.data.data)
            })
            .catch(function (error) {
                console.error(error);
            });
    },
    CLEAR_PRODUCTS({ commit }) {
        commit('CLEAR_PRODUCTS_CART');
        window.axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        axios.delete('/api/shopingcart/');
    },
    DELETE_PRODUCT({ commit }, product) {
        commit('DELETE_CART_ITEM', product);
        window.axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        axios.delete(`/api/shopingcart/${product.product_id}`);
    },
    BUY_PRODUCT({ commit }) {
        commit('CLEAR_PRODUCTS_CART');
        axios.post('/api/shopingcart/buyproduct')
    },
    INCREMENT_PRODUCT({ commit }, product) {
        commit('INCREMENT_CART_ITEM', product);
        window.axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        //axios.delete(`/api/shopingcart/${product.product_id}`);
    },
    DECREMENT_PRODUCT({ commit }, product) {
        commit('DECREMENT_CART_ITEM', product);
        window.axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        //axios.delete(`/api/shopingcart/${product.product_id}`);
    },
}

export default actions;
