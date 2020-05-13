
import {DefGauge} from "./DefGauge.js";

const gauges1 = new Map([
    ["09-", new DefGauge("09", "11", "16", "24", "32", "42")],
    ["10-", new DefGauge("10", "13", "17", "26", "36", "46")],
]);

const gauges2 = new Map([
    ["10-", new DefGauge("10", "14", "23", "30", "39", "47")],
    ["11-", new DefGauge("11", "15", "22", "32", "42", "52")],
    ["12-", new DefGauge("12", "16", "24", "32", "42", "53")],
    ["13-", new DefGauge("13", "17", "26", "35", "45", "56")],
]);

const gauges3 = new Map([
    ["040-", new DefGauge("040", "060", "080", "100")],
    ["045-", new DefGauge("045", "065", "085", "105")],
]);

export const DEF_GAUGES = new Map([
    ["1", gauges1],
    ["2", gauges2],
    ["3", gauges3],
]);
