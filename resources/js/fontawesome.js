// import fontawesome package
import { config, library, dom } from '@fortawesome/fontawesome-svg-core';
config.autoReplaceSvg = 'nest';


import {
    faCaretDown,
    faUser,
    faEnvelope,
    faLock,
    faQuestion,
    faUserAlt,
    faBars,
    faSearch,
    faComment,
    faBell,
    faTh,
    faThLarge,
    faDatabase,
    faUserCheck,
    faUserPlus,
    faUserLock,
    faFile,
    faCircle
} from '@fortawesome/free-solid-svg-icons';

library.add(
    faCaretDown,
    faUser,
    faEnvelope,
    faLock,
    faQuestion,
    faUserAlt,
    faBars,
    faSearch,
    faComment,
    faBell,
    faThLarge,
    faDatabase,
    faUserCheck,
    faUserPlus,
    faUserLock,
    faFile,
    faCircle,
);

dom.watch();
// import the icon we need broo