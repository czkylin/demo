'use strict';

import React from 'react';

import {
  StyleSheet,
  Text,
  View,
  Image
} from 'react-native';

class Base7 extends React.Component {
  render() {
    return() {
      <View style={styles.container}>
        <Image
          source={{uri:'http://facebook.github.io/react/img/logo_og.png'}}
        />
        <Text>ddd</Text>
      </View>
    }
  }
};

let styles = StyleSheet.create({
  container: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center'
  },
  image: {
    width: 100,
    height: 100
  }
})

//export default Base7;
export { Base7 as default };
