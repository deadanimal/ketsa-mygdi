import { DisclaimerComponent } from './disclaimer/disclaimer.component';
import { FaqComponent } from './faq/faq.component';
import { ContactusComponent } from './contactus/contactus.component';
import { PortalComponent } from './portal/portal.component';
import { Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { UserguideComponent } from './userguide/userguide.component';
import { MetadataComponent } from './metadata/metadata.component';
import { TutorialComponent } from './tutorial/tutorial.component';
import { PrivacyComponent } from './privacy/privacy.component';
import { MygeointroComponent } from './mygeointro/mygeointro.component';
import { AnnoucementComponent } from './annouce/annoucement/annoucement.component';
import { SubAnnoucementComponent } from './annouce/sub-annoucement/sub-annoucement.component';
import { DataChoiceComponent } from './dataasas/data-choice/data-choice.component';
import { DataListComponent } from './dataasas/data-list/data-list.component';

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
            {
                path: 'data-asas',
                component: DataChoiceComponent
            },
            {
                path: 'metadata',
                component: MetadataComponent
            },
            {
                path: 'tutorial',
                component: TutorialComponent
            },
            {
                path: 'disclaimer',
                component: DisclaimerComponent
            },
            {
                path: 'privacy',
                component: PrivacyComponent
            },
            {
                path: 'mygeoexplorer',
                component: MygeointroComponent
            },
            {
                path: 'annoucements',
                component: AnnoucementComponent
            },
            {
                path: 'sub-annoucement',
                component: SubAnnoucementComponent
            },
            {
                path: 'datalist',
                component: DataListComponent
            },
        ]
    }
]