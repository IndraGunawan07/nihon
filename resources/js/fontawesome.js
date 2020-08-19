// import fontawesome package
import { config, library, dom } from '@fortawesome/fontawesome-svg-core';
config.autoReplaceSvg = 'nest';


import {
    faCaretDown,
    faUser,
    faEnvelope,
    faLock,
    faQuestion,
    faUserAlt
} from '@fortawesome/free-solid-svg-icons';

library.add(
    faCaretDown,
    faUser,
    faEnvelope,
    faLock,
    faQuestion,
    faUserAlt
);

dom.watch();
// import the icon we need broo