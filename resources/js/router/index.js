import Vue from 'vue';
import Router from 'vue-router';

import Landing from '../views/Landing.vue';
import Auth from '../views/auth/Auth.vue';
import Forgot from '../views/auth/Forgot.vue';
import Reset from '../views/auth/Reset.vue';
import BecomeMember from '../views/BecomeMember.vue';
import Courses from '../views/Courses.vue';
import CoursesUser from '../views/app/CoursesUser.vue';
import Profile from '../views/app/Profile.vue';
import Home from '../views/app/Home.vue';
import Stanko from '../views/creators/Stanko.vue';
import Igor from '../views/creators/Igor.vue';
import Admin from '../views/app/admin/Admin.vue';
import CoursesAdmin from '../views/app/admin/Courses.vue';
import CourseAdmin from '../views/app/admin/Course.vue';
import EntranceQuiz from '../views/EntranceQuiz.vue';
import EntranceQuizResults from '../views/EntranceQuizResults.vue';

import Middleware from '../middleware/index.js';

Vue.use(Router);

const routes = [
    {
        path: '/',
        name: 'Naslovnica',
        component: Landing,
        meta: {
            middleware: [Middleware.guest]
        }
    },
    {
        path: '/tecajevi_pregled',
        name: 'Tecajevi pregled',
        component: Courses,
        meta: {
            middleware: [Middleware.guest]
        }
    },
    {
        path: '/postani_clan',
        name: 'Postani clan',
        component: BecomeMember,
        meta: {
            middleware: [Middleware.guest]
        }
    },
    {
        path: '/auth',
        name: 'Auth',
        component: Auth,
        meta: {
            middleware: [Middleware.guest]
        }
    },
    {
        path: '/forgot',
        name: 'Forgot',
        component: Forgot,
        meta: {
            middleware: [Middleware.guest]
        }
    },
    {
        path: '/reset/:token',
        name: 'Reset',
        component: Reset,
        meta: {
            middleware: [Middleware.guest]
        }
    },
    {
        path: '/kreatori/stanko',
        name: 'Stanko',
        component: Stanko,
        meta: {
            middleware: [Middleware.guest]
        }
    },
    {
        path: '/kreatori/igor',
        name: 'Igor',
        component: Igor,
        meta: {
            middleware: [Middleware.guest]
        }
    },
    {
        path: '/naslovnica',
        name: 'Pocetna',
        component: Home,
        meta: {
            middleware: [Middleware.auth]
        }
    },
    {
        path: '/admin',
        name: 'Admin',
        component: Admin,
        meta: {
            middleware: [Middleware.admin]
        }
    },
    {
        path: '/admin/tecajevi',
        name: 'CoursesAdmin',
        component: CoursesAdmin,
        meta: {
            middleware: [Middleware.admin]
        }
    },
    {
        path: '/admin/tecajevi/:tecaj_id',
        name: 'CourseAdmin',
        component: CourseAdmin,
        meta: {
            middleware: [Middleware.admin]
        }
    },
    {
        path: '/tecajevi',
        name: 'Tecajevi',
        component: CoursesUser,
        meta: {
            middleware: [Middleware.auth]
        }
    },
    {
        path: '/profil',
        name: 'Profile',
        component: Profile,
        meta: {
            middleware: [Middleware.auth]
        }
    },
    {
        path: '/ulazni_kviz',
        name: 'Entrance Quiz',
        component: EntranceQuiz,
        meta: {
            middleware: [Middleware.guest]
        }
    },
    {
        path: '/ulazni_kviz/rezultati/:score',
        name: 'Entrance Quiz Results',
        component: EntranceQuizResults,
        meta: {
            middleware: [Middleware.guest]
        }
    },
]

const router = new Router({
    mode: 'history',
    routes
});

// Creates a `nextMiddleware()` function which not only
// runs the default `next()` callback but also triggers
// the subsequent Middleware function.
function nextFactory(context, middleware, index) {
      const subsequentMiddleware = middleware[index];
      // If no subsequent Middleware exists,
      // the default `next()` callback is returned.
      if (!subsequentMiddleware) return context.next;
    
      return (...parameters) => {
        // Run the default Vue Router `next()` callback first.
        context.next(...parameters);
        // Then run the subsequent Middleware with a new
        // `nextMiddleware()` callback.
        const nextMiddleware = nextFactory(context, middleware, 1);
        subsequentMiddleware({ ...context, next: nextMiddleware });
      };
    }
    
    router.beforeEach((to, from, next) => {
      if (to.meta.middleware) {
        const middleware = Array.isArray(to.meta.middleware)
          ? to.meta.middleware
          : [to.meta.middleware];
    
        const context = {
          from,
          next,
          router,
          to,
        };
        const nextMiddleware = nextFactory(context, middleware, 1);
    
        return middleware[0]({ ...context, next: nextMiddleware });
      }
    
      return next();
    });

export default router;