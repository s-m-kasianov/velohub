export const CART_EMPTY = 'CART::EMPTY';
export const CART_FILL = 'CART::FILL';
export const CART_PENDING = 'CART::PENDING';
export const CART_PUSH = 'CART::PUSH';
export const CART_REMOVE = 'CART::REMOVE';
export const CART_UPDATE = 'CART::UPDATE';
export const CART_ERROR = 'CART::ERROR';

const initialState = {
    pending: false,
    error: false,
    products: [],
};

const cart = (state = initialState, action = {}) => {
    const {type, payload} = action;

    switch (type) {
    case CART_EMPTY:
        return {
            ...state,
            pending: false,
            error: null,
            products: initialState.products,
        };

    case CART_FILL:
        return {
            ...state,
            pending: false,
            error: true,
            products: payload || initialState.products,
        };

    case CART_PENDING:
        return {
            ...state,
            pending: true,
            error: null,
        };

    case CART_PUSH:
        return {
            ...state,
            pending: false,
            error: null,
            products: [...state.products, payload],
        };

    case CART_REMOVE:
        return {
            ...state,
            pending: false,
            error: null,
            products: state.products.filter((el) => payload.variant_id ?
                el.id !== payload.id && el.variant_id !== payload.variant_id :
                el.id !== payload.id,
            ),
        };

    case CART_UPDATE:
        return {
            ...state,
            pending: false,
            error: null,
            products: state.products.map((el) => {
                return {...(el.id === payload.id ? payload : el)};
            }),
        };

    case CART_ERROR:
        return {
            ...state,
            error: payload,
            pending: false,
        };

    default: return state;
    }
};

export default cart;
