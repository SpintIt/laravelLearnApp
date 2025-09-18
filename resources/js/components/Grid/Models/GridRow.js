import GridCell from './GridCell.js';

class GridRow
{
    /**
     * @type {Object.<string, GridCell>}
     */
    #cellList;

    /**
     * @param {Object.<string, GridCell>} cellList
     */
    constructor(cellList) {
        this.#cellList = cellList;
    }

    /**
     * @returns {Object<string, GridCell>}
     */
    getData()
    {
        return this.#cellList;
    }
}

export default GridRow;
