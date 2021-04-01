import axios from 'axios';
import {cartFill} from '../cart';
import {fireDanger} from '../toasts';

export function cartFetch() {
    return (dispatch) => {
        axios.get(`/api/carts/products`)
            .then((response) => {
                dispatch(cartFill(response.data));
            })
            .catch((err) => {
                dispatch(fireDanger('Failed fetching cart data'));
                console.error(err);
            });
    };
}
