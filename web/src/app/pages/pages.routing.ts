import { PortalComponent } from './portal/portal.component';
import { Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';

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
            }
        ]
    }
]