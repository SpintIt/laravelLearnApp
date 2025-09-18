import GridRow from './GridRow.js'
import GridCell from "./GridCell.js";

class Grid
{
    /**
     * @type {GridRow}
     */
    #headerRow;

    /**
     * @type {GridRow[]}
     */
    #rows;

    constructor() {
        this.#headerRow = new GridRow({
            'project': new GridCell('Project'),
            'budget': new GridCell('Budget'),
            'status': new GridCell('Status'),
            'users': new GridCell('Users'),
            'completion': new GridCell('Completion'),
        });
    }

    /**
     * @returns {GridRow}
     */
    getHeader()
    {
        return this.#headerRow;
    }
}

export default Grid;
