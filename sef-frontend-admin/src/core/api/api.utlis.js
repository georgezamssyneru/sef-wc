export const prepareRequestConfig = (payload, overrides = {}) => {
    return {
        method: 'POST', // *GET, POST, PUT, DELETE, etc.
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(payload),
        ...overrides,
    };
};