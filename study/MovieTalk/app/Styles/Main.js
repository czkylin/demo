'use strict';

import React from 'react-native';
let { StyleSheet } = React;

export default StyleSheet.create({
  container: {
    backgroundColor: '#eae7ff',
    flex: 1,
    paddingTop: 20,
    paddingLeft: 6,     //一个物理像素
    paddingRight: 6
  },
  item: {
    flexDirection: 'row',
    borderBottomWidth: 1,
    borderColor: 'rgba(100, 53, 201, 0.1)',
    paddingBottom: 6,
    marginBottom: 6,
    flex: 1
  },
  itemContent: {
    flex: 1,
    marginLeft: 13
  },
  itemHeader: {
    fontSize: 18,
    fontFamily: 'Helvetica Neue',
    fontWeight: '300',
    color: '#6435c9',
    marginBottom: 6
  },
  itemMeta: {
    fontSize: 16,
    color: 'rgba(0, 0, 0, 0.6)'
    marginBottom: 6
  },
  redText: {
    color: '#db2828',
    fontSize: 15
  },
  loading: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center'
  },
  itemText: {
    fontSize: 33,
    textAlign: 'center'
  },
  image: {
    width: 99,
    height: 138,
    margin: 0
  }
})
