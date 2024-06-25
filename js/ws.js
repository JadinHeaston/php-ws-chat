"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
const RECONNECT_DELAY = 5000;
let ws;
connectWebSocket();
function connectWebSocket() {
    return __awaiter(this, void 0, void 0, function* () {
        ws = new WebSocket("ws://127.0.0.1:3500/ws/");
        ws.onopen = function (event) {
            return __awaiter(this, void 0, void 0, function* () {
                console.log('WebSocket is open now.');
            });
        };
        ws.onmessage = function (event) {
            return __awaiter(this, void 0, void 0, function* () {
                console.log('Received message:', event.data);
            });
        };
        ws.onclose = function (event) {
            return __awaiter(this, void 0, void 0, function* () {
                console.log('WebSocket is closed now.');
                setTimeout(function () {
                    return __awaiter(this, void 0, void 0, function* () {
                        console.log('Attempting to reconnect...');
                        connectWebSocket();
                    });
                }, RECONNECT_DELAY);
            });
        };
        ws.onerror = function (event) {
            return __awaiter(this, void 0, void 0, function* () {
                console.error('WebSocket error observed:', event);
                setTimeout(function () {
                    return __awaiter(this, void 0, void 0, function* () {
                        console.log('Attempting to reconnect...');
                        connectWebSocket();
                    });
                }, RECONNECT_DELAY);
            });
        };
    });
}
