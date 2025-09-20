import GridRow from './GridRow.js'
import GridCell from "./GridCell.js";

class Grid {
    /**
     * @type {Array<Object>} data
     */
    #data;

    /**
     * @type {GridRow}
     */
    #headerRow;

    /**
     * @type {GridRow[]}
     */
    #rows;

    /**
     * @param {Array<Object>} data
     */
    constructor(data) {
        this.#data = data;

        this.#createHeader();
        this.#createRows();
    }

    #createHeader() {
        if (!this.#data || this.#data.length === 0) {
            this.#headerRow = new GridRow({});
            return;
        }

        const firstItem = this.#data[0];
        const headerCells = {};
        for (const key in firstItem) {
            if (Object.prototype.hasOwnProperty.call(firstItem, key)) {
                headerCells[key] = new GridCell(key);
            }
        }
        this.#headerRow = new GridRow(headerCells);
    }

    #createRows() {
        if (!this.#data || this.#data.length === 0) {
            this.#rows = [];
            return;
        }

        this.#rows = this.#data.map(item => {
            const rowCells = {};
            for (const key in item) {
                if (Object.prototype.hasOwnProperty.call(item, key)) {
                    rowCells[key] = new GridCell(item[key]);
                }
            }
            return new GridRow(rowCells);
        });
    }

    /**
     * @returns {GridRow}
     */
    getHeader() {
        return this.#headerRow;
    }

    /**
     * @returns {GridRow[]}
     */
    getRows() {
        return this.#rows;
    }
}

export default Grid;
