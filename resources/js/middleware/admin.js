export default function admin ({next, router}){
    if (!localStorage.getItem('role') || localStorage.getItem('role')  != 'admin'){
        return router.push({name: 'Auth'})
    }
    return next();
}