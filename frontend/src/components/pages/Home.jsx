import React,{useState,useEffect} from 'react';
import { Table } from "react-bootstrap";
import { NavLink } from "react-router-dom";
import Carousel from 'react-bootstrap/Carousel';
// 
import vector_bg from "../../images/vector_logo_2.svg";
import moon1 from "../../images/moon1.svg";
import fajar_moon from "../../images/fajar_moon.svg";
import sunrize_moon from "../../images/sunrize_moon.svg";
import zuhar_moon from "../../images/zuhar_moon.svg";
import sunset_moon from "../../images/sunset_moon.svg";
import magrib_moon from "../../images/magrib_moon.svg";
import ser_icon1 from "../../images/sevices_icon1.svg";
import ser_icon2 from "../../images/sevices_icon2.svg";
import ser_icon3 from "../../images/sevices_icon3.svg";
import ser_icon4 from "../../images/sevices_icon4.svg";
import ser_icon5 from "../../images/sevices_icon5.svg";
import ser_icon6 from "../../images/sevices_icon6.svg";
import icon2 from "../../images/icon-2.png";
import bannervector from "../../images/banner-01.png";
import bannervector2 from "../../images/banner-02.png";
import speaker from "../../images/speakericon.svg";
import play from "../../images/playicon.svg";
import event from "../../images/eventicon.svg";
import obituaries from "../../images/obituariesicon.svg";
import aboutbg from "../../images/about-bg.png";

import globallink from "../Globalurl";
import axios from 'axios';
// 
import PrayerTimeData from "../PrayerTimeData";
import HomeServivesLoop from "../pages/HomeServicesLoop";
import whatsapp_icon from "../../images/logo-02.png";
import whatsapp_icon2 from "../../images/logo-03.png";
import whatsapp_icon3 from "../../images/logo-04.png";

const Home = () => {
    var moment = require('moment-hijri');
    const PrayerTimeDataArray = [
        {
            key: "0",
            name: "Imsak",
            time: "4:53 AM",
            image: moon1,
        },
        {
            key: "1",
            name: "Fajr",
            time: "4:58 AM",
            image: fajar_moon,
        },
        {
            key: "2",
            name: "Sunrise",
            time: "6:32 AM",
            image: sunrize_moon,
        },
        {
            key: "3",
            name: "Zuhr",
            time: "1:20 PM",
            image: zuhar_moon,
        },
        {
            key: "4",
            name: "Sunset",
            time: "8:23 PM",
            image: sunset_moon,
        },
        {
            key: "5",
            name: "Maghrib",
            time: "8:23 PM",
            image: magrib_moon,
        },
    ]
    // HomeServicesLoopArray
    const HomeServicesLoopArray = [
        {
            key: "0",
            servicesicon1: ser_icon1,
            title: "Cultural Services",
            linksa: "cultural",
        },
        {
            key: "1",
            servicesicon1: ser_icon2,
            title: "Youth  Programs",
            linksa: "youth_services",
        },
        {
            key: "2",
            servicesicon1: ser_icon3,
            title: "Social Services ",
            linksa: "empowerment",
        },
        {
            key: "3",
            servicesicon1: ser_icon4,
            title: "Maktab ",
            linksa: "school",
        },
        {
            key: "4",
            servicesicon1: ser_icon5,
            title: "Library ",
            linksa: "library",
        },
        {
            key: "6",
            servicesicon1: ser_icon6,
            title: "Funeral ",
            linksa: "funeral_and_burial",
        },
    ]


    //const [manageleads,setmanageleads]=useState({manageleads_array:[]})
     const [title,settitle]=useState('')
     const [time,settime]=useState('')
     const [obituari,setobituaries]=useState({obituaries_array:[]})
     const [evente,setupcomingevent]=useState({upcoming_array:[]})
     const [recend,setrecend]=useState({recent_array:[]})
     const[homeday,setprayer]=useState({prayer_array:[]})
   
    
    useEffect(() => {

        axios
          .get(globallink.url+'cmspage/'+1)
          .then(response => {
           // setmanageleads({manageleads_array:response.data.cms});
            settitle(response.data.cms.title);
        });
        
          
      }, []);
      useEffect(() => {

        axios
          .get(globallink.url+'prayer-home')
          .then(response => {
           // setmanageleads({manageleads_array:response.data.cms});
            settime(response.data.prayer_home);
        });
        
          
      }, []);

      useEffect(() => {

        axios
          .get(globallink.url+'all-obituaries')
          .then(response => {
            setobituaries({obituaries_array:response.data.obituaries});
           //setobituaries(response.data.cms.title)
       

        });
          
      }, []);

      useEffect(() => {

          axios
          .get(globallink.url+'upcoming-events')
          .then(response => {
              setupcomingevent({upcoming_array:response.data.events});
          });


      },[]);

      useEffect(() => {

        axios
        .get(globallink.url+'latest-news')
        .then( response => {
            setrecend({recent_array:response.data.recent});

        })
      },[]);

      useEffect(() => {

        axios
        .get(globallink.url+'all-prayers')
        .then( response => {
            setprayer({prayer_array:response.data.homeday});

        })
      },[]);
     

      
    return (
        <>
         
    
            <Carousel>
  <Carousel.Item>
  <NavLink to={`${process.env.PUBLIC_URL}/Donat`} ><img
      className="d-block w-100"
      src={bannervector}
      alt="First slide"
    /></NavLink>
    
  </Carousel.Item>
  <Carousel.Item>
  <NavLink to={`${process.env.PUBLIC_URL}/Donat`} ><img
      className="d-block w-100"
      src={bannervector2}
      alt="Second slide"
    />
    </NavLink>
    
  </Carousel.Item>  
</Carousel>


		
      
            <div className="col-xl-12 col-12 mx-auto">
                <div className="d-flex row gx-0">
                    <div className="col-xl-6">
                        <div className="card-body h-100 py-5 shadowbg overflow-hidden paragraph_grey2bgcolor px-5">
                            <div className="text-center">
                                <h4 className="fontsize28 fontweightbold maintextcolor text-uppercase">Prayer Time</h4>
                                <p className="m-0 fontsize16 goldentextcolor">{time}</p>
                                 {/* <p className="m-0 fontsize16 goldentextcolor">16 Dhul Qadah 1442</p> */}
                                 <p className="m-0 fontsize16 goldentextcolor">
                                    {/* {moment({time}).format('iD/iM/iYYYY')}; */}
                                    {moment({time}).format('iMMMM iD iYYYY')};

                                    
                                    
                                    </p> 
                                <div className="table-responsive mt-4 mb-4 namaz-table">
                                    <Table>
                                        <tbody>
                                            {homeday.prayer_array.map((val,index) => {
                                                return (
                                                    <>
                                                    <tr className="highlight" key={index}>
                                                     <td>Imsak</td>
                                                      <td className="text-center"><img className="img-fluid" src={moon1} alt="moon" /></td>
                                                      <td>{val.Imsak} AM</td>
                                                    </tr>
                                                    <tr className="highlight">
                                                     <td>Fajr</td>
                                                      <td className="text-center"><img className="img-fluid" src={fajar_moon} alt="moon" /></td>
                                                      <td>{val.Fajr} AM</td>
                                                    </tr>
                                                    <tr className="highlight">
                                                     <td>Sunrise</td>
                                                      <td className="text-center"><img className="img-fluid" src={sunrize_moon} alt="moon" /></td>
                                                      <td>{val.Sunrise} AM</td>
                                                    </tr>
                                                    <tr className="highlight">
                                                     <td>Zuhr</td>
                                                      <td className="text-center"><img className="img-fluid" src={zuhar_moon} alt="moon" /></td>
                                                      <td>{val.Dhuhr} PM</td>
                                                    </tr>
                                                    <tr className="highlight">
                                                     <td>Sunset</td>
                                                      <td className="text-center"><img className="img-fluid" src={sunset_moon} alt="moon" /></td>
                                                      <td>{val.Sunset} PM</td>
                                                    </tr>
                                                    <tr className="highlight">
                                                     <td>Maghrib</td>
                                                      <td className="text-center"><img className="img-fluid" src={magrib_moon} alt="moon" /></td>
                                                      <td>{val.Maghrib} PM</td>
                                                    </tr>
                                                    </>
                                                )
                                            })}
                                        </tbody>
                                    </Table>
                                </div>
                                <div className="home_audio">
    
    <audio src="https://tecmyer.com.au/projects/acic/azan.mp3" event="" variant="" type="audio/ogg" controls preload="metadata">
  
</audio>
  </div>
                                <p className="m-0 goldentextcolor">
                                
                                    <strong className="maintextcolor">Note</strong> These timings are a general guideline, please<br />use precaution and check your local timings. </p>
                                <NavLink to={`${process.env.PUBLIC_URL}/monthli-timing`} className="d-inline-block maintextcolor fontweightmeduim px-4 py-2 mt-4 btn goldenbgcolor border_radius_100">View Monthly Timings</NavLink>
                            </div>
                        </div>
                    </div>

                    <div className="col-xl-6">
                        <div className="text-start h-100 align-items-center ">
                            <div className="card-body mainbgcolor px-5 py-5 shadowbg overflow-hidden geh h-100">
                                <div className="golden_head mb-4"><img width="30" className="me-2 img-fluid" src={speaker} alt="icon" /><strong className="me-2">Recent</strong> Announcements</div>
                                <div className="ps-4">
                                {recend.recent_array.map((val,index) => {
                                        
                                        return (
                                            <>
                                    <p className="paragraph" key={index}><img width="15" className="me-2 img-fluid" src={play} alt="icon" /><NavLink to={`${process.env.PUBLIC_URL}/detail/`+val.slug}> {val.title}</NavLink></p>
                                    </>
                                        )
                                })}
                                <NavLink className="morek" to={`${process.env.PUBLIC_URL}/AllAnnouncements`}>View All Announcements</NavLink>
                                </div>
                                <div className="golden_head mb-4"><img width="30" className="me-2 img-fluid" src={event} alt="icon" /><strong className="me-2">Upcoming</strong>  Events</div>
                                <div className="ps-4">
                                {evente.upcoming_array.map((val,index) => {
                                        
                                        return (
                                            <>
                                    <p className="paragraph" key={index}><img width="15" className="me-2 img-fluid" src={play} alt="icon" /> {val.title}</p>
                                    </>
                                    )
                                })}
                                <NavLink className="morek" to={`${process.env.PUBLIC_URL}/calendar`}>View Calender</NavLink>
                                </div>
                                <div className="golden_head mb-4"><img width="30" className="me-2 img-fluid" src={obituaries} alt="icon" /><strong className="me-2">Obituaries</strong>  Recent</div>
                                <div className="ps-4">
                                {obituari.obituaries_array.map((val,index) => {
                                        
                                        return (
                                            <>
                                    <p className="paragraph" key={index}><img width="15" className="me-2 img-fluid" src={play} alt="icon" /> {val.name}</p>
                                    {/* <p className="paragraph"><img width="15" className="me-2 img-fluid" src={play} alt="icon" /> {val.date_of_death}</p>
                                    <p className="paragraph"><img width="15" className="me-2 img-fluid" src={play} alt="icon" /> {val.date_of_burial}</p>
                                    <p className="paragraph"><img width="15" className="me-2 img-fluid" src={play} alt="icon" /> {val.cemetry}</p> */}
                                    </>
                                    )
                                })}
                                <NavLink className="morek" to={`${process.env.PUBLIC_URL}/AllObituaries`}>View All Obituaries</NavLink>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
          
            <div className="pt-100 pb-100 serviveshome">
                <div className="col-xl-11 col-11 mx-auto h-100">
                    <div className="text-center">
                        <h5 className="fontsize30 fontweightbold text-uppercase maintextcolor mb-5">Our Services</h5>
                    </div>
                    <div className="row">
                        {HomeServicesLoopArray.map((val,index) => {
                            return (
                                <HomeServivesLoop
                                    key={index}
                                    servicesicon1={val.servicesicon1}
                                    title={val.title}
                                    linksa={val.linksa}
                                />
                            )
                        })}
                    </div>
                </div>
            </div>
            <div className="row">

            
            <div class="text-center"><h5 class="fontsize30 fontweightbold text-uppercase maintextcolor mb-5">committees</h5></div>
            <div className="col-xl-7 col-7 mx-auto ">
                <div className="row whitebgcolor">
                    <div className="col-xl-4 col-lg-4 mb-5 text-center">
                     <div className="servivesbox">
                     <p className="m-0">
                     <NavLink to={`${process.env.PUBLIC_URL}/empowerment`}> <img className="img-fluid" src={whatsapp_icon} alt="icon" />
                     </NavLink>
                     </p>
                     </div>
                    </div>

                    <div className="col-xl-4 col-lg-4 mb-5 text-center">
                     <div className="servivesbox">
                     <p className="m-0">
                     <a href='https://maktab.ca/' target="new">
                         <img className="img-fluid" src={whatsapp_icon2} alt="icon" />
                         </a>
                         </p>
                     </div>
                    </div>

                    <div className="col-xl-4 col-lg-4 mb-5 text-center">
                     <div className="servivesbox">
                     <p className="m-0">
                     <NavLink to={`${process.env.PUBLIC_URL}/youth_services`}>
                         <img className="img-fluid" src={whatsapp_icon3} alt="icon" />
                         </NavLink>
                         </p>
                     </div>
                    </div>
                    </div>
                    </div>

                    
                    
                    </div>
            {/*  */}
            <div id="about" className="about paragraph_grey1bgcolor mb-5">
                <div className="row gx-0 ">
                    <div className="col-xl-5 d-none d-xl-block"><img className="img-fluid h-100" src={aboutbg} alt="icon" /></div>
                    <div className="col-xl-7 py-5">
                        <div className="px-xl-5 px-4">
                            <h6 className="">About Us</h6>
                            {/* <div className="d-flex align-items-center mb-4">
                                <NavLink to="#" className="fontsize16 p-0 me-3 fontweightregular goldentextcolor">Our History</NavLink>
                                <NavLink to="/expansion" className="fontsize16 fontweightregular maintextcolor p-0 me-3">Expansion Project</NavLink>
                                <NavLink to="/board_directors" className="fontsize16 fontweightregular maintextcolor p-0 me-3">Board of Directors</NavLink>
                            </div> */}
                            
                            <h5 className="goldentextcolor mb-2 text-capitalize fontsize24">Background</h5>
                            <p className="fontsize18 maintextcolor">Afghan Canadian Islamic Community (ACIC) is a non-proﬁt charitable organization providing cultural, social and religious services. </p>
                            <p className="fontsize18 maintextcolor">ACIC began its activites as a small community association in 1989 in response to the growing need of Afghan immigrants for a place where they can practice their religion, traditions, and celebrate cultural ceremonies. Two years later, in 1991, the organization  </p>
                            <p className="fontsize18 maintextcolor">ACIC currently provides services to about 1200 families and individual members as well as hundreds of non-members who participate, enjoy our programs, and beneﬁt from our services.  </p>
                            <h6 className="goldentextcolor mb-2 text-capitalize fontsize24">Vision</h6>
                            <p className="fontsize18 maintextcolor">A dynamic and inclusive community that constantly thrives towards cultural, social and spiritual growth</p>
                            <h6 className="goldentextcolor mb-2 text-capitalize fontsize24">Mission Statement</h6>
                            <p className="fontsize18 maintextcolor">To help members of the community make a positive difference by educating, inspiring and empowering them through a variety of educational and cultural programs.</p>
                        </div>
                    </div>
                </div>
            </div>



            

        </>
    )
}

export default Home;
