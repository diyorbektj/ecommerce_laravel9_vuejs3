
export const mutations = {
    UPDATE_CART_ITEM: function (state, payload) {
        let productInCart = state.cart.find(item => item.id == payload.id);
        if(productInCart){
            productInCart.quantity += 1;
            return;
        }
        state.cart.push(payload)
    },
    SET_PRODUCTS: function (state, payload) {
        state.cart = payload;
    },
    CLEAR_PRODUCTS_CART: function (state) {
        state.cart = [];
    },
    DELETE_CART_ITEM: function (state, payload) {
        state.cart = state.cart.filter(item => {
            return item.id !== payload.id
        });
    },
    INCREMENT_CART_ITEM: function (state, payload) {
        let productInCart = state.cart.find(item => item.id === payload.id);
        if(productInCart){
            productInCart.quantity += 1;
            return;
        }
        state.push(payload);
    },
    DECREMENT_CART_ITEM: function (state, payload) {
        let productInCart = state.cart.find(item => item.id === payload.id);
        if(productInCart.quantity === 1){
            state.cart = state.cart.filter(item => {
                return item.id !== payload.id
            });
        }
        if(productInCart){
            productInCart.quantity -= 1;
            return;
        }
        state.push(payload);
    }


}
