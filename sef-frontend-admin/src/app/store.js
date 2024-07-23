import { configureStore, applyMiddleware, createStore, getDefaultMiddleware } from '@reduxjs/toolkit';
import createSagaMiddleware from 'redux-saga';
import rootSaga from './saga';

import rootReducer from '../store/root-reducer';

const sagaMiddleware = createSagaMiddleware();

const myStore = () => {
    const store = configureStore({
        reducer: rootReducer,
        middleware: [...getDefaultMiddleware(), sagaMiddleware]
    });
    sagaMiddleware.run(rootSaga);
    return store;
}

export default myStore();