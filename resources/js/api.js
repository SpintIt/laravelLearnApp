/**
 * @type {Api}
 */
let api;

class Api {
    async getProducts() {
        const response = await axios.get('/api/v1/products', {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        return response.data.data;
    }

    async createProduct(data) {
        const formData = new FormData();

        for (const key in data) {
            if (data[key] instanceof File) {
                formData.append(key, data[key]);
            } else if (Array.isArray(data[key])) {
                data[key].forEach((item, index) => {
                    formData.append(`${key}[${index}]`, item);
                });
            } else if (data[key] !== null && data[key] !== undefined) {
                formData.append(key, data[key]);
            }
        }

        const response = await axios.post('/api/v1/products', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        return response;
    }

    clearData = (data) => {
        const target = data.value ? data.value : data;

        if (typeof target === 'object' && target !== null) {
            for (const key in target) {
                if (Object.prototype.hasOwnProperty.call(target, key)) {
                    Object.assign(target, { [key]: null });
                }
            }
        }
    }
}

if (!api) {
    api = new Api();
}

export default api
