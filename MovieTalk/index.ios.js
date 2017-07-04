/**
 * Sample React Native App
 * https://github.com/facebook/react-native
 * @flow
 */

import React, { Component } from 'react';
import {
  AppRegistry,
  TabBarIOS
} from 'react-native';

import MovieList from './app/ComponentsIOS/MovieList';
import ComingSoonList from './app/ComponentsIOS/ComingSoonList';
import icons from './app/Assets/Icons';
import Featured from './app/ComponentsIOS/Featured';
import ComingSoon from './app/ComponentsIOS/ComingSoon';

export default class MovieTalk extends Component {
  constructor(props) {
    super(props);

    this.state = {
      tabBar: 'Featured'
    }
  }

  render() {
    return (
      <TabBarIOS
        barTintColor="darkslateblue"
        tintColor="white"
        unselectedTintColor="#6435c9"
      >
        <TabBarIOS.Item
          title="正在热映"
          icon={{uri: icons.starActive, scale: 4.6}}
          selected={this.state.tabBar === 'Featured'}
          onPress= {() => {
            this.setState({
              tabBar: 'Featured'
            })
          }}
        >
          <Featured />
        </TabBarIOS.Item>
        <TabBarIOS.Item
          title="即将上映"
          icon={{uri: icons.calendar, scale: 4.6}}
          selected={this.state.tabBar === 'ComingSoon'}
          onPress = {() => {
            this.setState({
              tabBar: 'ComingSoon'
            })
          }}
        >
          <ComingSoon />
        </TabBarIOS.Item>
      </TabBarIOS>
    );
  }
}

AppRegistry.registerComponent('MovieTalk', () => MovieTalk);
