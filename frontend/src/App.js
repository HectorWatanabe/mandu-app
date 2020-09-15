import React from 'react';

import { Layout, Menu, Breadcrumb } from 'antd';
import TableDivision from './components/TableDivision';

const { Header, Content, Footer } = Layout;

function App() {
  return (
    <Layout className="layout">
      <Header>
        <div className="logo"><span>Divisiones App</span></div>
        <Menu theme="dark" mode="horizontal" defaultSelectedKeys={['1']}>
          <Menu.Item  key="1">Divisiones</Menu.Item>
        </Menu>
      </Header>
      <Content style={{ padding: '0 50px', margin: '2em 0' }}>
        <div className="site-layout-content">
          <TableDivision></TableDivision>
        </div>
      </Content>
      <Footer style={{ textAlign: 'center' }}>Divisiones App ©2020</Footer>
    </Layout>
  );
}

export default App;
