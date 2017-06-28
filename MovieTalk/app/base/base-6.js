'use strict';

import React from 'react';

import {
  StyleSheet,
  Text,
  View
} from 'react-native';

export default React.createClass({
  render() {
    return (
      <View style={styles.container}>
        <View style={[styles.item, style.itemOne], {marginTop: 200}}>
          <Text style={styles.itemText}> 1 </Text>
        </View>
        <View style={[styles.item, style.itemTwo]}}>
          <Text style={styles.itemText}> 2 </Text>
        </View>
        <View style={[styles.item, style.itemThree]}}>
          <Text style={styles.itemText}> 3 </Text>
        </View>
      </View>
    )
  }
})

let styles = StyleSheet.create({
  container: {
    backgroundColor: '#eae7ff',
    flex: 1;
    paddingTop: 20
  },
  item: {
    backgroundColor: '#fff',
    borderWidth: 1,
    borderColor: '#6435c9',
    margin: 6,
    width: 100
  },
  itemOne:{

  },
  itemText: {
    fontSize: 33,
    textAlign: 'center',
    fontWeight: '700'   //fontWeight必须是字符串
  }
})
