export default ({target}) => {
    const {name, value, type, checked} = target;
    const shards = window.location.pathname.split('/').filter((el) => el);
    const newQuery = [];
    const firsIn = [];
    let flag = true;

    for (let i = 0; i < shards.length; i++) {
        if (!shards[i].includes('-is-')) {
            firsIn.push(shards[i]);
            continue;
        }
        const [urlKey, urlVal] = shards[i].split('-is-');

        if (urlKey === 'price' && name === urlKey) {
            const values = Array.from(document.getElementsByName('price')).map((el) => el.value);

            if (values.length) {
                newQuery.push(`${urlKey}-is-${Math.min(...values)}-to-${Math.max(...values)}`);
                flag = false;
            }
        } else if (name === urlKey) {
            const urlValues = urlVal.split('-or-');
            const newValues = [];

            urlValues.forEach((el) => {
                if (el === value) {
                    flag = false;
                    return;
                }
                newValues.push(el);
            });

            if (type === 'checkbox' && checked) {
                newValues.push(value);
            }
            if (type === 'text' && value) {
                newValues.push(value);
            }
            if (newValues.length > 0) {
                newQuery.push(urlKey + '-is-' + newValues.join('-or-'));
                flag = false;
            }
        } else {
            newQuery.push(urlKey + '-is-' + urlVal);
        }
    }

    if (flag === true) {
        if (name === 'price') {
            const values = Array.from(document.getElementsByName('price')).map((el) => el.value);

            if (values.length) {
                newQuery.push(`${name}-is-${Math.min(...values)}-to-${Math.max(...values)}`);
            }
        } else {
            newQuery.push(name + '-is-' + value);
        }
    }

    window.location = '/' + sortAndCombineQuery(newQuery, firsIn) + '/' + window.location.search;
};

function sortAndCombineQuery(newQuery, firsIn) {
    let secondIn = [];
    const thirdIn = [];

    newQuery.forEach((el) => {
        if (el.startsWith('price-min')) {
            secondIn[0] = el;
        } else if (el.startsWith('price-max')) {
            secondIn[1] = el;
        } else if (el.startsWith('brand')) {
            secondIn[2] = el;
        } else {
            thirdIn.push(el);
        }
    });

    secondIn = secondIn.filter((value) => value);

    return [...firsIn, ...secondIn, ...thirdIn.sort()].join('/');
}
