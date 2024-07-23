import React, {useRef, useState, useEffect} from 'react';
import { DataGrid, GridRowsProp, GridColDef } from '@mui/x-data-grid';

/*
    --------------  DATA GRID COMPONENT
 */
export function DataGridComponent( props ) {

    React.useEffect(() => {
    }, []);

    return (
        <DataGrid
            sx={{ height: '350px', marginBottom: '100px' }}
            rows={props.rows}
            columns={props.columns}
            pageSize={props.pageSize}
            rowsPerPageOptions={props.rowsPerPageOptions}
        />
    );

}
