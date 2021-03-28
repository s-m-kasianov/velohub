import axios from 'axios';
import {cartRemove} from './cartActions';
import {fireDanger} from './toastsActions';

export default function cartProductDetach(product) {
    return (dispatch) => {
        return axios.patch(`/api/carts/products/detach`, product)
            .then(() => {
                dispatch(cartRemove(product));
            })
            .catch((err) => {
                dispatch(toastsActions('Failed updating cart data'));
                console.error(err);
            });
    };
}