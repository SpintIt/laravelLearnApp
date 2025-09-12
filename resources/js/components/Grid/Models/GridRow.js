import GridCell from './GridCell.js';

class GridRow
{
    getData()
    {
        return {
            'project': new GridCell('Project'),
            'budget': new GridCell('Budget'),
            'status': new GridCell('Status'),
            'users': new GridCell('Users'),
            'completion': new GridCell('Completion'),
        };
    }
}

export default GridRow;
