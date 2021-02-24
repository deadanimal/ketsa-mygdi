import { FaqComponent } from './faq/faq.component';
import { ContactusComponent } from './contactus/contactus.component';
import { PortalComponent } from './portal/portal.component';
import { Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { UserguideComponent } from './userguide/userguide.component';

export const PagesRoutes: Routes = [
    {
        path: '',
        children: [
            {
                path: 'home',
                component: HomeComponent
            },
            {
                path: 'portal',
                component: PortalComponent
            },
            {
                path: 'userguide',
                component: UserguideComponent
            },
            {
                path: 'contactus',
                component: ContactusComponent
            },
            {
                path: 'faq',
                component: FaqComponent
            },
            
        ]
    }
]