import {
    CART_OPEN,
    CART_CLOSE,
    CART_EMPTY,
    CART_FILL,
    CART_PENDING,
    // CART_PUSH,
    // CART_REMOVE,
    // CART_UPDATE,
} from '../reducers/cart';

export const cartOpen = () => ({
    type: CART_OPEN,
});

export const cartClose = () => ({
    type: CART_CLOSE,
});

export const cartEmpty = () => ({
    type: CART_EMPTY,
});

export const cartFill = (products) => ({
    type: CART_FILL,
    payload: products,
});

export const cartPending = () => ({
    type: CART_PENDING,
});

// export const cartPush = (product) => ({
//     type: CART_PUSH,
//     payload: product,
// });
//
// export const cartRemove = (product) => ({
//     type: CART_REMOVE,
//     payload: product,
// });
//
// export const cartUpdate = (product) => ({
//     type: CART_UPDATE,
//     payload: product,
// });
