/* tslint:disable: ordered-imports*/
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';

/* Modules */
import { AppCommonModule } from '@common/app-common.module';
import { NavigationModule } from '@modules/navigation/navigation.module';

/* Components */
import * as receipeComponents from './components';

/* Containers */
import * as receipeContainers from './containers';

/* Guards */
import * as receipeGuards from './guards';

/* Services */
import * as receipeServices from './services';

@NgModule({
    imports: [
        CommonModule,
        RouterModule,
        ReactiveFormsModule,
        FormsModule,
        AppCommonModule,
        NavigationModule,
    ],
    providers: [...receipeServices.services, ...receipeGuards.guards],
    declarations: [...receipeContainers.containers, ...receipeComponents.components],
    exports: [...receipeContainers.containers, ...receipeComponents.components],
})
export class ReceipeModule {}
