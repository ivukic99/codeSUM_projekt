export default function auth ({next, router}){
    if(!localStorage.getItem('token')){
        return router.push({name: 'Auth'})
    }

    return next();
    /* if (localStorage.getItem('role') == 'admin' && localStorage.getItem('token')){
        return router.push({name: 'Admin'})
    }
    else if (localStorage.getItem('token') && localStorage.getItem('role') != 'admin') {
        return next()
    }
    else{
        return router.push({name: 'Auth'})
    } */
}