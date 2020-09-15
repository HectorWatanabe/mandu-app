import React from 'react';
import { Table } from 'antd';
//import reqwest from 'reqwest';


class TableDivision extends React.Component {

    constructor(props) {
        super(props);

        this.columns = [
            { title: 'División', dataIndex: 'name', key: 'name' },
            { title: 'División Superior', dataIndex: 'upper_division', key: 'upper_division' },
            { title: 'Colaboradores', dataIndex: 'collaborators', key: 'collaborators' },
            { title: 'Subdivisiones', dataIndex: 'subdivision_count', key: 'subdivision_count' },
            { title: 'ambassador', dataIndex: 'ambassador', key: 'ambassador' }
        ];

        this.data = [
            { key: '1', name: 'Area TI', upper_division: '', collaborators: 20, subdivision_count: 0, ambassador: 'Héctor Chumpitaz' }
        ];

        this.state = {
            data: []
        };
    }

    /*
    fetch = (params = {}) => {
        this.setState({ loading: true });
        reqwest({
            url: 'http://127.0.0.1:8000/api/divisions',
            method: 'get',
            type: 'json',
        }).then(data => {
            console.log(data);
            this.setState({ data: data.results });
        });
    };
    */

    render() {
        return (
            <Table columns={this.columns} dataSource={this.data} />
        );
    }

}

export default TableDivision;