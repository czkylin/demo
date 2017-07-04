'use strict';

import React from 'react';
import styles from '../Styles/Main';
import ComingSoonList from './ComingSoonList';

import {
  Text,
  View,
  NavigatorIOS
} from 'react-native';

class ComingSoon extends React.Component {
  render() {
    return(
      <NavigatorIOS
        initialRoute={{
          component: ComingSoonList,
          title: '即将上映',
          barTintColor: 'darkslateblue',
          tintColor: 'rgba(255, 255, 255, 0.8)',
          titleTextColor: 'rgba(255, 255, 255, 0.8)',
        }}
        style={styles.container}

      >

      </NavigatorIOS>
    )
  }
};

export {ComingSoon as default}
