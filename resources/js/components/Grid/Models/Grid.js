import GridRow from './GridRow.js'

class Grid
{
    #headerRow;

    constructor() {
        this.#headerRow = (new GridRow());
    }

    getHeader()
    {
        return this.#headerRow;
    }
}

export default Grid;
