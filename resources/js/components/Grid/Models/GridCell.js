class GridCell
{
    #data;

    constructor(data) {
        this.#data = data;
    }

    getData()
    {
        return this.#data;
    }
}

export default GridCell;
