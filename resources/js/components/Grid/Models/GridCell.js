class GridCell
{
    /**
     * @type {string}
     */
    #data;

    /**
     * @param {string} data
     */
    constructor(data) {
        this.#data = data;
    }

    /**
     * @returns {string}
     */
    getData()
    {
        return this.#data;
    }
}

export default GridCell;
