import { Routes } from '@angular/router';
import { SettingsComponent } from './settings/settings.component';
import { NotificationsComponent } from './notifications/notifications.component';

export const GlobalRoutes: Routes = [
    {
        path: '',
        children: [
            {
                path: 'notifications',
                component: NotificationsComponent
            },
            {
                path: 'settings',
                component: SettingsComponent
            }
        ]
    }
]