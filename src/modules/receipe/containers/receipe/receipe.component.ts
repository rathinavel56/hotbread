import { ChangeDetectionStrategy, Component, OnInit } from '@angular/core';

@Component({
    selector: 'sb-receipe',
    changeDetection: ChangeDetectionStrategy.OnPush,
    templateUrl: './receipe.component.html',
    styleUrls: ['receipe.component.scss'],
})
export class ReceipeComponent implements OnInit {
    constructor() {}
    ngOnInit() {}
}
