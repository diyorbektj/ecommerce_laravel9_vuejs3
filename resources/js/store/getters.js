export const getters = {
    cartProducts(state) {
        return state.cart.length;
    },
    CartItems: state => state.cart,
    getTotalPrice: state => {
        let total = 0;
        state.cart.forEach(item => {
            total += item.price * item.quantity;
        });
        return total;
    }
}
