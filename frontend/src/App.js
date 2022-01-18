import React from 'react';
import { BrowserRouter as Router, Switch,Route } from 'react-router-dom';

// component import
import Header from './components/Header';
import Footer from './components/Footer';

// component pages import
import Home from "./components/pages/Home";
import Membership from "./components/pages/Membership";
import School from "./components/pages/School";
import FuneralBurial from "./components/pages/FuneralBurial";
import Cultural from "./components/pages/Cultural";
import WomenServices from "./components/pages/WomenServices";
import YouthServices from "./components/pages/YouthServices";
import Empowerment from "./components/pages/Empowerment";
import Library from "./components/pages/Library";
import Calendarpage from "./components/pages/Calendarpage";
import Publication from "./components/pages/Publication";
import Livestream from "./components/pages/Livestream";
import Dua from "./components/pages/Dua";
import Duajawshan from "./components/pages/Duajawshan";
import Duakumayl from "./components/pages/Duakumayl";
import MonthliTiming from "./components/pages/MonthliTiming";
import Login from "./components/pages/Login";
import Signup from "./components/pages/Signup";
import Forgot from "./components/pages/Forgot";
import RenewMembership from "./components/pages/RenewMembership";
import Register from "./components/pages/Register";
import Expansion from "./components/pages/Expansion";
import BoardDirectors from "./components/pages/BoardDirectors";
import About from "./components/pages/About";
import Profile from "./components/Profile";
import MembershipDetail from "./components/pages/MembershipDetail";
import MembershipLevel from "./components/pages/MembershipLevel";

import BecomMembership from "./components/pages/BecomMembership";
import AllObituaries from "./components/pages/AllObituaries";
import AllAnnouncements from "./components/pages/AllAnnouncements";

// css import
import "../node_modules/bootstrap/dist/css/bootstrap.css";
import "../node_modules/rc-tabs/assets/index.css";
import './App.scss';
import "../node_modules/react-calendar/dist/Calendar.css";
import '../node_modules/owl.carousel/dist/assets/owl.carousel.css';
import '../node_modules/owl.carousel/dist/assets/owl.theme.default.css';
import Detail from '../src/components/pages/Detail';
import donat from '../src/components/pages/Donat';

function App() {
  return (
    
    <>
      <Router>
        <Header/>
        <Switch>
          <Route exact path={`${process.env.PUBLIC_URL}/`} component={Home}></Route>
          <Route path={`${process.env.PUBLIC_URL}/membership`} component={Membership}></Route>
          <Route path={`${process.env.PUBLIC_URL}/school`} component={School}></Route>
          <Route path={`${process.env.PUBLIC_URL}/funeral_and_burial`} component={FuneralBurial}></Route>
          <Route path={`${process.env.PUBLIC_URL}/cultural`} component={Cultural}></Route>
          <Route path={`${process.env.PUBLIC_URL}/women_services`} component={WomenServices}></Route>
          <Route path={`${process.env.PUBLIC_URL}/youth_services`} component={YouthServices}></Route>
          <Route path={`${process.env.PUBLIC_URL}/empowerment`} component={Empowerment}></Route>
          <Route path={`${process.env.PUBLIC_URL}/library`} component={Library}></Route>
          <Route path={`${process.env.PUBLIC_URL}/calendar`} component={Calendarpage}></Route>
          <Route path={`${process.env.PUBLIC_URL}/publication`} component={Publication}></Route>
          <Route path={`${process.env.PUBLIC_URL}/livestream`} component={Livestream}></Route>
          <Route path={`${process.env.PUBLIC_URL}/dua`} component={Dua}></Route>
          <Route path={`${process.env.PUBLIC_URL}/login`} component={Login}></Route>
          <Route path={`${process.env.PUBLIC_URL}/signup`} component={Signup}></Route>
          <Route path={`${process.env.PUBLIC_URL}/forgot_password`} component={Forgot}></Route>
          <Route path={`${process.env.PUBLIC_URL}/renew_membership`} component={RenewMembership}></Route>
          <Route path={`${process.env.PUBLIC_URL}/register`} component={Register}></Route>
          <Route path={`${process.env.PUBLIC_URL}/expansion`} component={Expansion}></Route>
          <Route path={`${process.env.PUBLIC_URL}/board_directors`} component={BoardDirectors}></Route>
cxvxcv
          <Route path={`${process.env.PUBLIC_URL}/become_membership`} component={BecomMembership}></Route>
          <Route path={`${process.env.PUBLIC_URL}/dua-jawshan`} component={Duajawshan}></Route>
          <Route path={`${process.env.PUBLIC_URL}/dua-kumayl`} component={Duakumayl}></Route>
          <Route path={`${process.env.PUBLIC_URL}/monthli-timing`} component={MonthliTiming}></Route>
          <Route path={`${process.env.PUBLIC_URL}/about`} component={About}></Route>
          <Route path={`${process.env.PUBLIC_URL}/detail/:slug`} component={Detail}></Route>
          <Route path={`${process.env.PUBLIC_URL}/AllObituaries`} component={AllObituaries}></Route>
          <Route path={`${process.env.PUBLIC_URL}/AllAnnouncements`} component={AllAnnouncements}></Route>
          <Route path={`${process.env.PUBLIC_URL}/Donat`} component={donat}></Route>
          <Route path={`${process.env.PUBLIC_URL}/profile`} component={Profile}></Route>
          <Route path={`${process.env.PUBLIC_URL}/membership-detail`} component={MembershipDetail}></Route>
          <Route path={`${process.env.PUBLIC_URL}/membership-level`} component={MembershipLevel}></Route>

        </Switch>
        <Footer/>
      </Router>
    </>
  );
}

export default App;
