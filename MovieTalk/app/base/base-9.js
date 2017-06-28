'use strict';

import React from 'react';

import {
  StyleSheet,
  Text,
  View,
  Image
} from 'react-native';

export default React.createClass({
  render() {
    return() {
      <View style={styles.container}>
        <Image
          source={{uri: 'http://img7.doubanio.com/view/photo/photo/public/p2191398861.jpg'}}
          style={styles.backgroundImage}
        >
          <View style={styles.overlay}>
            <Text style={styles.overlayHeader}>机器总动员</Text>
            <Text style={styles.overlaySubHeader}>Wall E (2008)</Text>
            <ContentText>dddddd</ContentText>
          </View>
        </Image>
      </View>
    }
  }
});

class ContentsText extends React.Component {
  render() {
    return (
      <Text>{this.props.children}</Text>
    )
  }
}

let styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#eae7ff',
    paddingTop: 20
  },
  overlayHeader: {
    fontSize: 33,
    fontFamily: 'Helvetica Neue',
    color: '#eae7ff',
    padding: 10
  },
  overlaySubHeader: {
    fontSize: 16,
    fontFamily: 'Helvetica Neue',
    fontWeight: '200',
    padding: 10,
    paddingTop: 0,
    color: '#eae7ff'
  },
  backgroundImage: {
    flex: 1,
    resizeMode: 'cover'
  },
  image: {
    width: 99,
    height: 138,
    margin: 0
  },
  overlay: {
    backgroundColor: "rgba(0, 0, 0, 0.3)",
    alignItems: 'center'
  }
})

//export default Base7;
export { Base7 as default };
