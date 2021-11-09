import { ChangeDetectionStrategy, Component, OnInit } from '@angular/core';

@Component({
    selector: 'sb-dashboard-sales',
    changeDetection: ChangeDetectionStrategy.OnPush,
    templateUrl: './dashboard-sales.component.html',
    styleUrls: ['dashboard-sales.component.scss'],
})
export class DashboardSalesComponent implements OnInit {
    constructor() {}
    ngOnInit() {}
}
